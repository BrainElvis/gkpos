<div id="categoryList">
    <div class="category-list"></div>
</div>
<script>
    $(document).ready(function () {
        getcategory();
    });
    function getcategory(pageBtn = '') {
        var firstCatOrder = $("#firstCatOrder").val();
        var lastCatOrder = $("#lastCatOrder").val();
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/getcategory') ?>",
            data: {
                firstCatOrder: firstCatOrder,
                lastCatOrder: lastCatOrder,
                pageBtn: pageBtn,
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                if (true === output.status) {
                    $('#categoryList > .category-list').html('');
                    var objectLength = output.categories.length;
                    var firstObject = output.categories[0];
                    var lastObject = output.categories[objectLength - 1];
                    $("#firstCatOrder").val(firstObject.order);
                    $("#lastCatOrder").val(lastObject.order);
                    var index = 1;
                    var btnColorClass;
                    $.each(output.categories, function () {
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
                        $('#categoryList > .category-list').append('<div id="' + this.id + '" class="' + btnColorClass + 'btn btn-block btn-primary text-uppercase" data-order="' + this.order + '" title="' + this.content + '" onclick=getMenuByCategory("' + this.id + '")>' + this.title + '</div>');
                        index++;
                    });
                } else {
                    alert("Nothing more");
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }
        });
    }


</script>