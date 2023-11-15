[HttpPost]
public ActionResult Create(Employee employee)
{
    if (string.IsNullOrEmpty(employee.Name))
    {
        ModelState.AddModelError("Name", "Name is required");
    }
    if (employee.Salary < 0)
    {
        object value = ModelState.AddModelError("Salary", "Salary must be greater than or equal to 0");
    }
    if (ModelState.IsValid)
    {
        // Save the data to the database
        return RedirectToAction("Index");
    }
    // If the data is invalid, show the form again with error messages
    return View(employee);
}

[HttpPost]
public ActionResult UpdateProfile(ProfileModel model)
{
    if (ModelState.IsValid)
    {
        // Các xử lý khi thông tin hợp lệ
        return RedirectToAction("Profile", new { id = model.Id });
    }
    // Nếu thông tin không hợp lệ, thêm lỗi vào ModelState
    if (string.IsNullOrEmpty(model.Name))
    {
        ModelState.AddModelError("Name", "Tên không được bỏ trống");
    }
    else if (!Regex.IsMatch(model.Name, "^[a-zA-Z]+$"))
    {
        ModelState.AddModelError("Name", "Tên chỉ chứa chữ cái");
    }
    if (string.IsNullOrEmpty(model.Email))
    {
        ModelState.AddModelError("Email", "Email không được bỏ trống");
    }
    else if (!Regex.IsMatch(model.Email, @"^[^@\s]+@[^@\s]+\.[^@\s]+$"))
    {
        ModelState.AddModelError("Email", "Email không hợp lệ");
    }
    // Trả về view với các lỗi đã được thêm vào ModelState
    return View("EditProfile", model);
}