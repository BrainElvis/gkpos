<div id="categoryList">
    <div class="category-list"></div>
</div>
<script>
    $(document).ready(function () {
        $.post("<?php echo site_url('gkpos/orders/getcategory') ?>", {data: 1}, function (output) {
            if (true === output.status) {
                var objectLength = output.data.length;
                var firstObject = output.data[0];
                var lastObject = output.data[objectLength - 1];
                $("#firstCatId").val(firstObject.id);
                $("#firstCatOrder").val(firstObject.order);
                $("#lastCatId").val(lastObject.id);
                $("#lastCatOrder").val(lastObject.order);
                var index = 1;
                var btnColorClass;
                $.each(output.data, function () {
                    if (index % 2 == 0) {
                        btnColorClass = "btn-devide-by-two ";
                    } else if (index % 3 == 0 && index % 2 != 0) {
                        btnColorClass = "btn-devide-by-three ";
                    } else if (index % 7 == 0 && index % 2 != 0 && index % 3 != 0) {
                        btnColorClass = "btn-devide-by-seven ";
                    } else if (index % 5 == 0 && index % 2 != 0 && index % 3 != 0 && index % 4 != 0) {
                        btnColorClass = "btn-devide-by-five ";
                    } else {
                        btnColorClass = "btn-devide-by-one ";
                    }
                    $('.category-list').append('<div id="' + this.id + '" class="' + btnColorClass + 'btn btn-block btn-primary text-uppercase" data-order="' + this.order + '" title="' + this.content + '" onclick=getMenuByCategory("' + this.id + '")>' + this.title + '</div>');
                    index++;
                });
            }
        }, 'json');
    });

</script>