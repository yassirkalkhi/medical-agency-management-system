const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".image-text"),
      searchbtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      main = body.querySelector("main"),
      rendezvoustable = body.querySelector("table");
      modet = body.querySelector(".mode"),
      modeText  = body.querySelector(".mode-text");
      var w = window.innerWidth; 
      console.log(w)
      if(w < 991){
        sidebar.classList.toggle("close");
      }
      toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        main.classList.toggle("close");
      });
      modeSwitch,modet.addEventListener("click", () => {
        body.classList.toggle("dark");
        rendezvoustable.classList.toggle("table-dark")
      if(body.classList.contains("dark")){
        modeText.innerText = "Dark Mode"
      }else{
        modeText.innerText = "Light Mode" 
      }
   });
  
