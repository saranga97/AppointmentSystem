<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
</head>
<body>
    <h1>Add Patient</h1>
    <form method="post" action="/patients/store">
        <label>Name:</label>
        <input type="text" name="name">
        <br>
        <label>Email:</label>
        <input type="email" name="email">
        <br>
        <label>Phone:</label>
        <input type="text" name="phone">
        <br>
        <label>Address:</label>
        <textarea name="address"></textarea>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
