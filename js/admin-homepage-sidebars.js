


//student
function studentDetail(){


    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-studentdetail.php'); 
    xhr.send();


    setTimeout(tableData,30)
    // tableData();
  }







function studentAdd(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-studentadd.html'); 
    xhr.send();
  }



//teacher

  
function teacherDetail(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-teacherdetail.php'); 
    xhr.send();


    setTimeout(teacherList,30);
    // teacherList();
  }



  function teacherAdd(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-teacheradd.html'); 
    xhr.send();
  }


//admin


  function adminDetail(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };  
    xhr.open('GET', 'admin-admindetail.php'); 
    xhr.send();

    setTimeout(adminList,30);
    // adminList();
  }


  function adminAdd(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-adminadd.html'); 
    xhr.send();
  }



  function events1(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-events.php');
    xhr.send();




    setTimeout(eventLists,30);
  }






  function announcement1(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-announcement.html');
    xhr.send();
  }