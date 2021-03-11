<div class="search">
    <form class="search_field" action="" method="get">
        <label for="find">
            <input id="find" name="find" type="text" placeholder="Some dinner">
        </label>
        <label for="search">
            <input id="search"name="search" type="submit" value="Search">
        </label>
        <label for="reset">
            <input id="reset" name="reset" type="submit" value="Reset">
        </label>
    </form>
    <?php 
        if (isset($_GET["search"])) {
            $recipes->search(htmlspecialchars($_GET["find"]));
        } else if (isset($_GET["reset"])) {
            $recipes->search(htmlspecialchars(""));
        }
    ?>
</div>