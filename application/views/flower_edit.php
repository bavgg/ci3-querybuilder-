<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <?php
    echo validation_errors();
    echo form_open('flowers/verifyEdit/'.$this->uri->segment(3), ''); // Fixed the concatenation syntax
    extract($flower);

    echo form_label('Flower Name', 'flower_name'); // Fixed form_label syntax
    echo form_input('flower_name', $flower_name, 'id="flower_name"') . '<br>'; // Fixed form_input syntax and variable name

    echo form_label('Price', 'price');
    echo form_input('price', $price, 'id="price"') . '<br>';

    echo form_label('is Available?', 'isAvailable');
    echo form_checkbox('isAvailable', '1', $isAvailable == 1 ? TRUE : FALSE) . '<br>'; // Fixed form_checkbox syntax and variable name

    echo form_submit('btnUpdate', 'Update');
    echo form_close();
    ?>
</body>

</html>