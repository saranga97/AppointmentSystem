<!DOCTYPE html>
<html>
<head>
    <title>Add Inventory Item</title>
</head>
<body>
    <h1>Add Inventory Item</h1>
    <form method="post" action="/inventories/store">
        <label>Item Name:</label>
        <input type="text" name="item_name">
        <br>
        <label>Quantity:</label>
        <input type="number" name="quantity">
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
