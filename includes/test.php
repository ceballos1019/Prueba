<!-- Menú de navegación de administrador -->
<nav role="navigation" class="navbar navbar-personalizado navbar-static-top" id="navigation-bar"> 
  <div class="container"> 
    <div class="navbar-header">     
      <button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar app-bar"></span>  
        <span class="icon-bar app-bar"></span>
        <span class="icon-bar app-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="nav navbar-nav nav-personalizado">
        <li id="inventario">
          <a data-toggle="collapse" data-target=".navbar-collapse.in">
            <span class="icon-books"></span> Inventario
          </a>
        </li> 
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-transfer"></span> Actividad <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li id="entrada">
              <a data-toggle="collapse" data-target=".navbar-collapse.in">Entrada</a>
            </li>
            <li id="salida">
              <a data-toggle="collapse" data-target=".navbar-collapse.in">Salida</a>
            </li> 
          </ul>
        </li>        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-search"></span> Consulta <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li id="bodegas">
              <a data-toggle="collapse" data-target=".navbar-collapse.in">Bodegas</a>
            </li>           
            <li id="libs">
              <a data-toggle="collapse" data-target=".navbar-collapse.in">Librerías</a>
            </li>
            <li id="proveedores">
              <a data-toggle="collapse" data-target=".navbar-collapse.in">Proveedores</a>
            </li>
          </ul>
        </li>     
      </ul>    
      <ul class="nav navbar-nav navbar-right nav-personalizado">
        <li>
          <a href="includes/funciones.php?log_out">
            <span class="glyphicon glyphicon-log-out log-out-icon"></span> Cerrar Sesión 
          </a>
        </li>
      </ul>
    </div>    
  </div>
</nav>
<section id="contenido">
  <?php
  include("includes/salida.php");
  ?>
</section>


