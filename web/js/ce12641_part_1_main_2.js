        function trash(ele, url, asseturl){
                //var url=$(this).attr('href');
                $(ele).html('<img src=\''+asseturl+'\'>');
                $.post(url,function(data){                  
                    alert("Book: "+data.title+" was deleted ");
                    $(ele).parent().html('Deleted');
                    $("a.ajax-trash").click(function(event){
                        event.preventDefault();
                    });
                });
        }
