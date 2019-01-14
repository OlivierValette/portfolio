<form role="search" method="get" class="searchform" action="<?php bloginfo('url'); ?>">
	<input type="search" class="searchfield" value="<?= get_search_query(); ?>" name="s">
	<button type="submit" class="searchsubmit">
        <i class="fa fa-search"></i>
        Rechercher
    </button>
</form>