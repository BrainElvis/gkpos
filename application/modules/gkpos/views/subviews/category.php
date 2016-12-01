<div id="categoryList">
    <ul class="category-list"></ul>
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
                $.each(output.data, function () {
                    $('.category-list').append('<li id="' + this.id + '" class="cat-tab" order="' + this.order + '" title="' + this.content + '" >' + this.title + '</li>');
                });
            }
        }, 'json');
        $("#categoryList > ul li").click(function () {
            alert("working");
        });
    });

</script>