<?php




?>

<style>
    *{padding: 0; margin:0;-webkit-box-sizing: border-box;box-sizing: border-box;font-family: monospace;font-size: 1rem;color:#666; text-shadow: 5px 5px 10px #202020,
    -5px -5px 10px #464646; text-align: center; font-weight: 600;}
    #newpost{
          min-height: 100vh;
          background-color: #333;
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-pack: center;
              -ms-flex-pack: center;
                  justify-content: center;
          -webkit-box-align:center ;
              -ms-flex-align:center ;
                  align-items:center ;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
              -ms-flex-direction: column;
                  flex-direction: column;
      }
      form{
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
              -ms-flex-direction: column;
                  flex-direction: column;
          -webkit-box-pack: center;
              -ms-flex-pack: center;
                  justify-content: center;
          -webkit-box-align: center;
              -ms-flex-align: center;
                  align-items: center;
          width: 50%;
          
      }

      textarea{
        margin-top: 10px;
    border: none;
    outline: none;
    border-radius: 20px;
    height: 100px;
    -webkit-box-shadow: 5px 5px 10px #202020,
    -5px -5px 10px #464646;
            box-shadow: 5px 5px 10px #202020,
    -5px -5px 10px #464646;
    background-color: #333;
    cursor: pointer;

      }

    

      input{
    margin-top: 10px;
    border: none;
    outline: none;
    border-radius: 20px;
    height: 30px;
    -webkit-box-shadow: 5px 5px 10px #202020,
    -5px -5px 10px #464646;
            box-shadow: 5px 5px 10px #202020,
    -5px -5px 10px #464646;
    background-color: #333;
    cursor: pointer;
      }
      label{
    margin-top: 10px;
      }

      #submit{
          margin-top: 30px;
          width: 50px;
          height: 50px;
          border-radius: 50%;
      }

      span{
          color: #a70101;;
      }
</style>

<div id="newpost">

<h2>Ajouter un article</h2>

<form action="" method="POST">

<label for="title">Titre</label>
<input type="text" name="title" id="title">
<span class="error"></span>

<label for="content">Titre</label>
<textarea name="content" id="content" cols="30" rows="5" style="resize:none"></textarea>
<span class="error"></span>

<label for="auteur">auteur (facultatif)</label>
<input type="text" name="auteur" id="auteur">
<span class="error"></span>

<input id="submit" type="submit" name="submitted" value="GO">
</form>

<script>
  const btn =document.querySelector('#submit')
        btn.addEventListener('click' ,aller)

        function aller(){

btn.style.transform='perspective(500px) translateZ(-100px)'}
</script>

</div>