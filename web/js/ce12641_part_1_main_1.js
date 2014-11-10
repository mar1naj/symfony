        function trash(ele, url, asseturl){
            $(document).ready(function(){
                //var url=$(this).attr('href');
                $(ele).html('<img src=\''+asseturl+'\'>');
                $.post(url,function(data){                  
                    //alert("Album id: "+data.id+" Trash: "+data.todelete);
                    $(ele).parent().html('Deleted');
                    $("a.ajax-trash").click(function(event){
                        event.preventDefault();
                    });
                });
            });
        }
