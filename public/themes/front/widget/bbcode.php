<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
        <div class="editor-buttons " data-parent="editor-` + i + `">
			<div class="btn-group">
				<select class="fontFace form-select form-select-sm">
					<option value="-1" selected="selected">Шрифт:</option>
					<option class="post-font-serif1 fw-bold" data-bbcode="font.serif1">Georgia</option>
					<option class="post-font-serif2" data-bbcode="font.serif2">&nbsp;Palatino</option>
					<option class="post-font-sans1 fw-bold" data-bbcode="font.sans1">Arial</option>
					<option class="post-font-sans2" data-bbcode="font.sans2">&nbsp;Trebuchet MS</option>
					<option class="post-font-sans3" data-bbcode="font.sans3">&nbsp;Segoe UI</option>
					<option class="post-font-mono1 fw-bold" data-bbcode="font.mono1">Monospaced</option>
					<option class="post-font-mono2" data-bbcode="font.mono2">&nbsp;Consolas</option>
					<option class="post-font-cursive1 fw-bold" data-bbcode="font.cursive1">Comic Sans MS</option>
					<option class="post-font-impact" data-bbcode="font.impact">Impact</option>
				</select>
				<select class="codeColor form-select form-select-sm">
					<option style="color: black; background: #fff;" value="-1" selected="selected">Цвет:</option>
					<option style="color: darkred;"  data-bbcode="color.darkred">&nbsp;Тёмно-красный</option>
					<option style="color: brown;"  data-bbcode="color.brown">&nbsp;Коричневый</option>
					<option style="color: #996600;"  data-bbcode="color.#996600">&nbsp;Оранжевый</option>
					<option style="color: red;"  data-bbcode="color.red">&nbsp;Красный</option>
					<option style="color: #993399;"  data-bbcode="color.#993399">&nbsp;Фиолетовый</option>
					<option style="color: green;"  data-bbcode="color.green">&nbsp;Зелёный</option>
					<option style="color: darkgreen;"  data-bbcode="color.darkgreen">&nbsp;Тёмно-Зелёный</option>
					<option style="color: gray;"  data-bbcode="color.gray">&nbsp;Серый</option>
					<option style="color: olive;"  data-bbcode="color.olive">&nbsp;Оливковый</option>
					<option style="color: blue;"  data-bbcode="color.blue">&nbsp;Синий</option>
					<option style="color: darkblue;"  data-bbcode="color.darkblue">&nbsp;Тёмно-синий</option>
					<option style="color: indigo;"  data-bbcode="color.indigo">&nbsp;Индиго</option>
					<option style="color: #006699;"  data-bbcode="color.#006699">&nbsp;Тёмно-Голубой</option>
				</select>
				<select class="codeSize form-select form-select-sm">
					<option value="-1" selected="selected">Размер:</option>
					<option data-bbcode="size.10" class="fw-bold">Маленький</option>
					<option data-bbcode="size.11">&nbsp;size=11</option>
					<option data-bbcode="size.12" class="fw-bold" disabled="disabled">Обычный</option>
					<option data-bbcode="size.14">&nbsp;size=14</option>
					<option data-bbcode="size.16">&nbsp;size=16</option>
					<option data-bbcode="size.18" class="fw-bold">Большой</option>
					<option data-bbcode="size.20">&nbsp;size=20</option>
					<option data-bbcode="size.22">&nbsp;size=22</option>
					<option data-bbcode="size.24" class="fw-bold">Огромный</option>
				</select>
			</div>
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
