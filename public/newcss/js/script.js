var abc = 0; //Declaring and defining global increement variable
var ci = 1
var laimg = 1
var cimg = 1
$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
		ci += 1;
		$(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
				$("<br><br><label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>Product Detail Image "+ ci +"<span class='required'>*</span></label>")
				));
				
		$(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
				$("<input/>", {name: 'file[]', type: 'file', id: 'file'}),        
                //$("size=700*850 pixel"),
				$("<br/><br/>")
                ));
    });
	
	$('#add_more_large').click(function() {
		laimg += 1;
		$(this).before($("<div/>", {id: 'filedivlarge'}).fadeIn('slow').append(
				$("<br><br><label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>Large Image "+ laimg +"<span class='required'>*</span></label>")
				));
				
		$(this).before($("<div/>", {id: 'filedivlarge'}).fadeIn('slow').append(
				$("<input/>", {name: 'largefile[]', type: 'file', id: 'file'}),        
                //$("size=700*850 pixel"),
				$("<br/><br/>")
                ));
    });
	
	$('#add_more_new').click(function() {
		cimg += 1;
		$(this).before($("<div/>", {id: 'filedivnew'}).fadeIn('slow').append(
				$("<br><br><label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>Charity Banner "+ cimg +"<span class='required'>*</span></label>")
				));
				
		$(this).before($("<div/>", {id: 'filedivnew'}).fadeIn('slow').append(
				$("<input/>", {name: 'charityfiles[]', type: 'file', id: 'file'}),        
                //$("size=700*850 pixel"),
				$("<br/><br/>")
                ));
    });

//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' width='25%' 10src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'http://localhost/ampleshop/public/images/x.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});