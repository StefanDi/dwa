<div id="header">
	<h1>Here. In My Head</h1>
	<div id="welcome-bar">Welcome, <span class="bold"><?=$user->first_name?></span>! - <a href="/users/logout">Log Out</a></div>
</div>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1" id="poem-builder-btn">Poem Builder</a></li>
        <li><a href="#tabs-2" id="my-poems-btn">My Poems</a></li>
        <li><a href="#tabs-3" id="stream-btn">Stream</a></li>
        <li><a href="#tabs-4" id="all-poets-btn">All Poets</a></li>
        <li><a href="#tabs-5" id="my-profile-btn">My Profile</a></li>
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
			<div id="custom" class="accordion-btn accordion-btn-default">Custom</div>
			<div id="custom-content" class="accordion-content hidden">
				<label for="add-word-field" class="off-screen">Enter a word to add</label><!--for accessibility-->
				<input id="add-word-field" type="text" />
				<a id="add-word-btn" class="btn">Add</a>
				<br /><br />
			</div>

		</div>
		<div id="right">
			<div id="canvas">
				<div id="trash">
					<img src="../assets/trash.png" alt="Trashcan" />
				</div>
			</div>
			
			<div id="canvas-temp" class="hidden"></div><!--for storing temp canvas info-->
			
			<label for="poem-name" id="poem-name-label">Poem Name:</label>
			<input id="poem-name" name="poem_name" type="text" />
			<a class="btn" id="publish-btn">Publish</a>
			
			<a class="btn" id="clear-btn">Clear Board</a>
			<a class="btn" id="print-btn">Print</a>
			
		</div>
		</div>
	<div id="publish-confirm-dialog" class="hidden">
		Your poem has been published.
	</div>
    </div>
    
    <div id="tabs-2">
		<div id="my-poems-content"></div>
    </div>
    
    <div id="tabs-3">
        <div id="stream-content"></div>
    </div>
    
    <div id="tabs-4">
        <div id="all-poets-content"></div>
    </div>
    
    <div id="tabs-5">
    	<div id="my-profile-content"></div>
    </div>
    
</div>