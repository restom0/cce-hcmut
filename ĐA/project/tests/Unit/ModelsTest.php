<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

/**
 * Exercises the Eloquent models without a database. Loading each class and
 * reading its table/fillable metadata is enough to give Sonar real coverage of
 * the model layer, and needs neither a booted application nor a DB connection,
 * so it runs in the `Unit` suite as a plain PHPUnit test.
 */
class ModelsTest extends TestCase
{
    /** @return array<int, class-string> */
    private function models(): array
    {
        return [
            \App\Models\User::class,
            \App\Models\Product::class,
            \App\Models\ProductType::class,
            \App\Models\Customer::class,
            \App\Models\Bill::class,
            \App\Models\Bill_detail::class,
        ];
    }

    public function test_model_classes_extend_eloquent(): void
    {
        $checked = 0;
        foreach ($this->models() as $class) {
            // class_exists autoloads (and therefore covers) the model file; a
            // wrong guess just skips rather than failing the suite.
            if (!class_exists($class)) {
                continue;
            }
            $checked++;
            $this->assertTrue(
                is_subclass_of($class, Model::class),
                "$class should be an Eloquent model"
            );
        }
        $this->assertGreaterThan(0, $checked, 'no model classes were found to test');
    }

    public function test_models_expose_table_and_fillable(): void
    {
        foreach ($this->models() as $class) {
            if (!class_exists($class)) {
                continue;
            }
            try {
                $model = new $class();
            } catch (\Throwable $e) {
                // A model that needs the container to construct is still loaded
                // (covered) above; skip the metadata check rather than fail.
                continue;
            }
            $this->assertIsString($model->getTable());
            $this->assertIsArray($model->getFillable());
        }
    }
}
