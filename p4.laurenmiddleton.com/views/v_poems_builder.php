<div id="header">
	<h1>Here. In My Head</h1>
	<div id="welcome-bar">Welcome, <span class="bold"><?=$user->first_name?></span>! - <a href="/users/logout">Log Out</a></div>
</div>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Poem Builder</a></li>
        <li><a href="#tabs-2" id="my-poems-btn">My Poems</a></li>
        <li><a href="#tabs-3">Stream</a></li>
    </ul>
    <div id="tabs-1">
        <div id="container">
		<div id="left">
			<div id="nouns" class="accordion-btn accordion-btn-clicked">Nouns</div>
			<div id="nouns-content" class="accordion-content"></div>
			<div id="verbs" class="accordion-btn accordion-btn-default">Verbs</div>
			<div id="verbs-content" class="accordion-content hidden"></div>
			<div id="adj" class="accordion-btn accordion-btn-default">Adjectives</div>
			<div id="adj-content" class="accordion-content hidden"></div>
			<div id="helpers" class="accordion-btn accordion-btn-default">Helper Words</div>
			<div id="helpers-content" class="accordion-content hidden"></div>
			<div id="punctuation" class="accordion-btn accordion-btn-default">Punctuation</div>
			<div id="punctuation-content" class="accordion-content hidden"></div>
			
		</div>
		<div id="right">
			<div id="canvas">
				<div id="trash">
					<img src="../assets/trash.png" alt="Trashcan" />
				</div>
			</div>
			<a class="btn" id="print-btn">Print</a>
			<a class="btn" id="publish-btn">Publish</a>
			<a class="btn" id="clear-btn">Clear Board</a>
		</div>
	</div>
    </div>
    <div id="tabs-2">
        
        <!--If the user hasn't made any posts yet, prevent a SQL error-->
<!--<? if($show_no_posts_message): ?>
	You haven't posted anything yet!
<? endif; ?>-->

<? foreach($poems as $poem): ?>

	<div class="my-poem-parent">
		<span class="delete-poem-btn">
			<a href="/poems/delete/<?=$poem['poem_id']?>" title="Delete poem">x</a>
		</span>
		<h3>
			<?=$poem['first_name']?> <?=$poem['last_name']?>
		</h3>
		<span class="poem-timestamp">
			published <?=Time::display($poem['created'], "", "America/New_York")?>
		</span>
		<br><br>
		<?=$poem['content']?>
	</div>
	
		
<? endforeach; ?>
        
    </div>
    <div id="tabs-3">
        <p>stream</p>
    </div>
</div>