import $ from 'jquery'

class Like{
    constructor(){
      this.events();
    }

    events(){
         $(".like-box").on("click", this.ourClickDispatcher.bind(this));
    }

    //methods
    ourClickDispatcher(e){
       var currentLikeBox = $(e.target).closest(".like-box");

       if(currentLikeBox.data('exists') == 'yes'){
            this.deleteLike();
       }else{
            this.createLike();
       }
    }

    createLike(){
       alert("To create");
    }
    deleteLike(){
        alert("To delete");
    }
}

export default Like;