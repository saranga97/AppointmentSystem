<!DOCTYPE html>
<html>
<head>
    <title>Add Report</title>
</head>
<body>
    <h1>Add Report</h1>
    <form method="post" action="/reports/store">
        <label>Type:</label>
        <input type="text" name="report_type">
        <br>
        <label>Content:</label>
        <textarea name="content"></textarea>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
