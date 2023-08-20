$(document).ready(function() {
    $('#all_posts').click(function(event){
        if(this.checked) {
            $('.checkBoxes').each(function(){
                this.checked = true;
            })
        }
        else {
            $('.checkBoxes').each(function(){
                this.checked = false;;
            })
        }
    })

});