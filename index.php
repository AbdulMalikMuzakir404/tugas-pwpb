<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Index</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>


<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f7f7f7;
  padding: 0 10px;
}
.wrapper{
  background: #fff;
  max-width: 430px;
  width: 100%;
  border-radius: 20px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}

.form{
  padding: 25px 30px;
}
.form header{
  font-size: 25px;
  font-weight: 600;
  text-align: center;
  margin-bottom: 25px;
  margin-top: 20px;
}
.form form{
  margin: 20px 0;
}
.form form .name-details{
  display: flex;
}
.form .name-details .field:first-child{
  margin-right: 10px;
}
.form .name-details .field:last-child{
  margin-left: 10px;
}
.form form .field{
  display: flex;
  margin-bottom: 10px;
  flex-direction: column;
  position: relative;
}
.form form .field label{
  margin-bottom: 8px;
}
.form form .input input{
  height: 40px;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 6px;
  border: none;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}
.form form .field input{
  outline: none;
}
.form form .image input{
  font-size: 17px;
}
.form form .button input{
  height: 45px;
  border: none;
  color: #fff;
  font-size: 17px;
  background: #ff7f50;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 13px;
  transition: 1s;
}
.form form .button input:hover{
  color: #ff7f50;
  background: #fff;
  transition: 1s;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}


}
</style>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>PWPB</header>
      <form action="data.php" method="GET" autocomplete="off">
        <div class="field input">
          <label>Name</label>
          <input type="text" name="nama" placeholder="Name" required>
        </div>
        <div class="field input">
          <label>Email</label>
          <input type="email" name="email" placeholder="Example@gmail.com" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Masukan">
        </div>
      </form>
    </section>
  </div>
</body>
</html>