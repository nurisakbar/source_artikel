<script src="<?php echo base_url()?>jquery_hotkeys/jquery-1.4.2.js"></script>
<script src="<?php echo base_url()?>jquery_hotkeys/jquery.hotkeys.js"></script>
<script type="text/javascript">
 

$(document).ready(function(){ 
    alert('ok1');
//when you use jquery, 
//it is good practice to wait until the document is ready.
    $(document).bind('keydown', 'f12', function() {
    //the add function requires an argument, so make sure to provide one.
        alert('ok2');
    });
});
</script>


<input type="text" id="test" onkeydown="add()">