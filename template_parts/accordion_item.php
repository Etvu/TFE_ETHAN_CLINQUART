<?php if(isset($args["question"]) && isset($args["reponse"])){?>
<details>
    <summary><?php  echo "+".$args["question"]; ?></summary>
    <p>
    <?php echo $args["reponse"] ?>
    </p>
</details>
<?php }  ?>