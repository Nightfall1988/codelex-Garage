<form method="POST" id="<?php echo $this->car->getName();?>">
<div class="ProductContainer" style="border-color:<?php echo $this->color; ?>; border-style: solid; border-width: thick; padding: 10;">
<input type='hidden' name="name" value="<?php echo $this->car->getName(); ?>"></input>
    <p name="name" value="<?php echo $this->car->getName(); ?>"><b><?php echo $this->car->getName(); ?></b></p>
    <p class="model">Model: <b><?php echo $this->car->getModel(); ?></b><br></p>
    <p class="price">Price: <b>€<?php echo $this->car->getPrice(); ?></b><br></p>
    <p class="expand">Expendature per 100 km: <?php echo $this->car->getExpend(); ?></p>
    <?php
        if ($this->car->getStatus() == false) {
            echo "<input formaction='rent' type='submit' value='Rent it!'></input>\n";
        } else {
            echo "<input formaction='return' type='submit' value='Return'></input>\n";
        }
    ?>
</div>
</form>
<br>
