<?php
$items = array(
    array('id' => '79','parentId' => '0','position' => '999','pageName' => 'Beter Leven'),
    array('id' => '48','parentId' => '47','position' => '0','pageName' => 'Bief Select'),
    array('id' => '66','parentId' => '62','position' => '5','pageName' => 'Catering'),
    array('id' => '72','parentId' => '0','position' => '999','pageName' => 'Contact'),
    array('id' => '58','parentId' => '56','position' => '999','pageName' => 'Excursies'),
    array('id' => '56','parentId' => '0','position' => '999','pageName' => 'Extra informatie'),
    array('id' => '84','parentId' => '59','position' => '2','pageName' => 'Filmpjes'),
    array('id' => '83','parentId' => '59','position' => '3','pageName' => 'Foto\'s'),
    array('id' => '73','parentId' => '62','position' => '4','pageName' => 'Groothandel'),
    array('id' => '52','parentId' => '47','position' => '2','pageName' => 'Henk Broeders'),
    array('id' => '49','parentId' => '47','position' => '1','pageName' => 'Historie'),
    array('id' => '46','parentId' => '0','position' => '0','pageName' => 'Home'),
    array('id' => '67','parentId' => '62','position' => '6','pageName' => 'Horeca'),
    array('id' => '54','parentId' => '47','position' => '999','pageName' => 'Ketenverantwoordelijkheid'),
    array('id' => '61','parentId' => '56','position' => '999','pageName' => 'Links'),
    array('id' => '59','parentId' => '56','position' => '999','pageName' => 'Media'),
    array('id' => '50','parentId' => '0','position' => '3','pageName' => 'Milieubewust'),
    array('id' => '55','parentId' => '50','position' => '999','pageName' => 'Milieubewust boeren'),
    array('id' => '60','parentId' => '56','position' => '999','pageName' => 'Nieuws'),
    array('id' => '53','parentId' => '47','position' => '999','pageName' => 'Onze dieren'),
    array('id' => '47','parentId' => '0','position' => '1','pageName' => 'Over Bief Select'),
    array('id' => '77','parentId' => '0','position' => '999','pageName' => 'Puur Eerlijk'),
    array('id' => '75','parentId' => '0','position' => '999','pageName' => 'Puur Lekker'),
    array('id' => '76','parentId' => '0','position' => '999','pageName' => 'Puur Natuur'),
    array('id' => '81','parentId' => '0','position' => '999','pageName' => 'Recept Biefstuk'),
    array('id' => '82','parentId' => '0','position' => '999','pageName' => 'Recept Stoofpotje'),
    array('id' => '78','parentId' => '0','position' => '999','pageName' => 'Recepten van Rudolf'),
    array('id' => '80','parentId' => '0','position' => '999','pageName' => 'Recepten van top koks'),
    array('id' => '65','parentId' => '62','position' => '2','pageName' => 'Slachterij'),
    array('id' => '70','parentId' => '62','position' => '7','pageName' => 'Slagerij'),
    array('id' => '68','parentId' => '62','position' => '8','pageName' => 'Supermarkten'),
    array('id' => '64','parentId' => '62','position' => '1','pageName' => 'Transporteurs'),
    array('id' => '63','parentId' => '62','position' => '0','pageName' => 'Veehouders'),
    array('id' => '57','parentId' => '56','position' => '999','pageName' => 'Veel gestelde vragen'),
    array('id' => '69','parentId' => '62','position' => '3','pageName' => 'Verpakker'),
    array('id' => '62','parentId' => '0','position' => '999','pageName' => 'Volgtraject'),
    array('id' => '71','parentId' => '0','position' => '1000','pageName' => 'Waar te koop?'),
    array('id' => '51','parentId' => '50','position' => '999','pageName' => 'Zelfvoorzieningscyclus')
);
    $tree = self::buildMenuTree($items);
    return view('menu', [
        'items' => $items,
        'tree' => $tree
    ]);    

?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>

      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
			<?php foreach($items as $page){?>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $page['pageName'] }} <span class="caret"></span></a>
				  <ul class="dropdown-menu">
				    <li><a href="#">Action</a></li>
				  </ul>
				</li>
			<?php
			}
			?>

	      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php 
	echo $tree;
?>