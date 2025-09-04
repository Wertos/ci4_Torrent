        <div class="editor-buttons " data-parent="editor-` + i + `">
            <!--
			<div class="btn-group mb-2 mr-2 me-1 d-block">
			    <select name="fontFace">
					<option value="-1" selected="selected">Шрифт:</option>
					<option class="post-font-serif1 em" value="serif1">Georgia</option>
					<option class="post-font-serif2" value="serif2">&nbsp;Palatino</option>
					<option class="post-font-sans1 em" value="sans1">Arial</option>
					<option class="post-font-sans2" value="sans2">&nbsp;Trebuchet MS</option>
					<option class="post-font-sans3" value="sans3">&nbsp;Segoe UI</option>
					<option class="post-font-mono1 em" value="mono1">Monospaced</option>
					<option class="post-font-mono2" value="mono2">&nbsp;Consolas</option>
					<option class="post-font-cursive1 em" value="cursive1">Comic Sans MS</option>
					<option class="post-font-impact" value="impact">Impact</option>
				</select>
			</div>
			-->
        	<div class="btn-group mr-2 me-1">
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.bold'); ?>" data-bbcode="b"><i class="bi bi-type-bold"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.italic'); ?>" data-bbcode="i"><i class="bi bi-type-italic"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.underline'); ?>" data-bbcode="u"><i class="bi bi-type-underline"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.strike'); ?>" data-bbcode="s"><i class="bi bi-type-strikethrough"></i></button>
        	</div>
        	<div class="btn-group mr-2 me-1">
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.left'); ?>" data-bbcode="left"><i class="bi bi-text-left"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.center'); ?>" data-bbcode="center"><i class="bi bi-text-center"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.right'); ?>" data-bbcode="right"><i class="bi bi-text-right"></i></button>
        	</div>
        	<div class="btn-group mr-2 me-1">
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.quote'); ?>" data-bbcode="quote"><i class="bi bi-chat-left-quote"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.img'); ?>" data-bbcode="img"><i class="bi bi-image"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.url'); ?>" data-bbcode="url"><i class="bi bi-link"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.spoiler'); ?>" data-bbcode="spoiler"><i class="bi bi-plus-square-dotted"></i></button>
        	</div>
        	<div class="btn-group mr-2 me-1">
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.code'); ?>" data-bbcode="code"><i class="bi bi-braces"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" title="<?= lang('BBcode.pre'); ?>" data-bbcode="pre"><i class="bi bi-code-square"></i></button>
        	</div>
       		<div class="btn-group dropdown">
       			<button type="button" class="btn btn-primary btn-sm dropdown-toggle" type="button" id="smilies" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-emoji-smile"></i></button>
       			<div class="dropdown-menu bg-white" aria-labelledby="smilies" id="smilies_table"></div>
       		</div>
        </div>
