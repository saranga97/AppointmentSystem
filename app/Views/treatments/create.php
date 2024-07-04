<!DOCTYPE html>
<html>
<head>
    <title>Add Treatment</title>
</head>
<body>
    <h1>Add Treatment</h1>
    <form method="post" action="/treatments/store">
        <label>Patient ID:</label>
        <input type="text" name="patient_id">
        <br>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
