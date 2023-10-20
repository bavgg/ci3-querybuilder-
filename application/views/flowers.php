<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $flower) : ?>
                <tr>
                    <td><?php echo $flower["flower_id"]; ?></td>
                    <td><?php echo $flower["flower_name"]; ?></td>
                    <td><?php echo $flower["price"]; ?></td>
                    <td><?php echo $flower["isAvailable"] == 1 ? 'Available' : 'Not Available'; ?></td>
                    <td>
                        <a href="<?php echo "http://localhost:8080/"."flower/edit/".$flower["flower_id"]; ?>">Edit</a>
                        <a href="<?php echo "http://localhost:8080/".'flowers/delete/'.$flower["flower_id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>