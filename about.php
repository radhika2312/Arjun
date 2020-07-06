<!DOCTYPE html>
<html lang="en">
<head>
<title>ADMIN PORTAL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  align:center;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}



</style>
</head>
<body>

<div class="about-section">
  <h1>About Us </h1>
  <h3>Students of MNNIT.</h3>
  
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="/w3images/team1.jpg" alt="radhika" style="width:100%">
      <div class="container">
        <h2>Radhika Gupta</h2>
        <p class="title">Team Cool girls</p>
        <p>First year studenst,Computer science department.</p>
        <p>Motilal nehru National inistitute of technology</p>
        
      </div>
    </div>
  </div>

  

  <div class="column">
    <div class="card">
      <img src="" alt="aparna" style="width:100%">
      <div class="container">
        <h2>Aparna Mittal</h2>
        <p class="title">Team Cool girls</p>
        <p>First year studenst,Computer science department.</p>
        <p>Motilal nehru National inistitute of technology</p>
        
      </div>
    </div>
  </div>
</div>
    


</body>


