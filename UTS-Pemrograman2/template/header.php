<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: "Poppins", sans-serif;
  min-height: 100vh;
}
    
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 1rem 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 5;
    background: #3C3633;
  }
  
  .logo {
    width: 40px;
  }

  .nav-item {
    position: relative;
    color: white;
    font-size: 2 rem;
    font-weight: 500;
    line-height: 25px;
    letter-spacing: -0.13px;
    text-decoration: none;
    margin-left: 2.5rem;
    transition: all 0.5s ease;
    font : bold;
  }
  
  .nav-item:hover {
    color: #E0CCBE;
  }
  
  .nav-item::after {
    content: "";
    position: absolute;
    bottom: -0.3rem;
    left: 50%;
    width: 0;
    height: 0.15rem;
    transform: translateX(-50%);
    background-color: #E0CCBE;
    transition: all 0.5s ease;
  }
  
  .nav-item:hover::after {
    width: 100%;
  }

  .icons {
  position: absolute;
  right: 5%;
  font-size: 2.3rem;
  color: white;
  cursor: pointer;
  display: none;
}

#check {
  display: none;
}

@media (max-width: 768px) {
  header {
    padding: 1.3rem 5%;
  }
}

@media (max-width: 700px) {
  header::before {
    content: "";
    top: 0;
    left: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(50px);
    z-index: -1;
  }

  header::after {
    content: "";
    top: 0;
    left: -100%;
    position: absolute;
    width: 100%;
    height: 100%;
    transition: 0.8s;
  }

  .icons {
    display: inline-flex;
  }

  #check:checked ~ .icons #menu-icon {
    display: none;
  }

  .icons #close-icon {
    display: none;
  }

  #check:checked ~ .icons #close-icon {
    display: block;
  }

  .navbar {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    height: 0;
    background: #3C3633;
    backdrop-filter: blur(100px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
  }

  #check:checked ~ .navbar {
    height: 17.7rem;
  }

  .nav-item {
    display: block;
    font-size: 1.1rem;
    margin: 2rem 0;
    text-align: center;
    transform: translateY(-50px);
    opacity: 0;
    transition: all 0.3s ease;
  }

  .nav-item:hover::after {
    width: auto;
  }

  #check:checked ~ .navbar a {
    transform: translateY(0);
    opacity: 1;
    transition-delay: calc(0.15s * var(--i));
  }
}

    </style>
</head>
<body>
    <header>
          <img
            src="assets/LOGO STMIK SZ NW.png"
            alt="logo"
            class="logo"
        />
        <input type="checkbox" id="check" />
        <label for="check" class="icons">
            <i class="bx bx-menu" id="menu-icon"></i>
            <i class="bx bx-x" id="close-icon"></i>
        </label>
        <nav class="navbar">
          <a href="Home.php" class="nav-item" style="--i: 0">HOME</a>
          <a href="data_mhs.php" class="nav-item" style="--i: 1">DATA MAHASISWA</a>
          <a href="data_dosen.php" class="nav-item" style="--i: 2">DATA DOSEN</a>
          <a href="Home.php" class="nav-item" style="--i: 2">LOG OUT</a>
        </nav>
      </header>
</body>
</html>