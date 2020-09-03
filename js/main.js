$(document).ready(function () {
    filter_data();
    function filter_data() {
        $('.filter_data').html('<div id="loading" style=""></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');

        $.ajax({
            url: "/model/action.php",
            method: "POST",
            data: { action: action, minimum_price: minimum_price, maximum_price: maximum_price, brand: brand, ram: ram, storage: storage },
            success: function (data) {
                console.log(maximum_price + " " + minimum_price + " " + brand);
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function () {
        filter_data();
    });

    $('#price_range').slider({
        range: true,
        min: 1000,
        max: 65000,
        values: [1000, 65000],
        step: 500,
        stop: function (event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });



    // fetch the data from the database 
    fetch_data();
    function fetch_data() {
        $.ajax({
            url: "/model/action.php",
            method: "POST",
            data: { fetchData: 1 },
            success: function (data) {
                $("#live_data").html(data);
            }
        })
    }
    // add the product to the database 
    $(document).on('click', '#btn_add', function () {
        var product_name = $('#product_name').text();
        var product_brand = $('#product_brand').text();
        var product_price = $('#product_price').text();
        var product_ram = $('#product_ram').text();
        var product_storage = $('#product_storage').text();
        var product_camera = $('#product_camera').text();
        var product_image = $('#product_image').text();
        var product_quantity = $('#product_quantity').text();
        var product_status = $('#product_status').text();
        // validate 
        if (product_name == '' || product_brand == '' || product_price == '' || product_ram  == '' || product_storage == '' || product_camera == ''
        || product_image == '' || product_quantity == '' || product_status == ''){
            $('.message').html("<b class='text-danger'>Please fill all fields</b>");
            $('#msgModal').modal('show');
            return false;
        }
        
        $.ajax({
            url: "/model/action.php",
            method: "POST",
            data: { addData:1, product_name:product_name,product_brand:product_brand,product_price:product_price,product_ram:product_ram,
                product_storage:product_storage,product_camera:product_camera,product_image:product_image,product_quantity:product_quantity,product_status:product_status},
            dataType: "text",
            success: function (data) {
                $('.message').html("<b class='text-success'>" + data + "</b>");
                $('#msgModal').modal('show');
                fetch_data(); // refresh the list 
            }
        });
    });

    // function to edit data 

    function edit_data(id, text, column_name){
        $.ajax({
            url: "/model/action.php",
            method: "POST",
            data: { editData:1,id:id,text:text,column_name:column_name},
            dataType: "text",
            success: function (data) {
                console.log("ID:" + id + "Text: " + text + "Column Name: " + column_name);
                $('.message').html("<b class='text-success'>" + data + "</b>");
                $('#msgModal').modal('show');
                fetch_data(); // refresh the list 
            }
        });
    }
    // duplicate the onblur function for all the editable columns 
    $(document).on('blur', '.product_name', function(){
        var id = $(this).data("id1");
        var text = $(this).text();
        edit_data(id, text, "product_name"); // product_name is the column name from the database 
    });

    $(document).on('blur', '.product_brand', function(){
        var id = $(this).data("id2");
        var text = $(this).text();
        edit_data(id, text, "product_brand"); // product_name is the column name from the database 
    });

    // delete data 
    $(document).on('click', '.btn_delete', function(){
        var id = $(this).data("id10");
        if(confirm("Are you sure you want to delete this product?")){
            $.ajax({
                url: "/model/action.php",
                method: "POST",
                data: { deleteData:1,id:id},
                dataType: "text",
                success: function (data) {
                    $('.message').html("<b class='text-success'>" + data + "</b>");
                    $('#msgModal').modal('show');
                    fetch_data(); // refresh the list 
                }
            });
        }
    })

}); 