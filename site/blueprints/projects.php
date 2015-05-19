<?php if(!defined('KIRBY')) exit ?>

title: Projects
pages: project
files: true
fields:
	title:
		label: Title
		type: text
	filters:
    label: Filter class name
    type:  tags
	projthumb:
		label: Project thumbnail
		type: structure
		entry: >
			{{category}} <br>
			{{link}} <br>
			{{thumb}}
		fields:
			category:
				label: Class name of thumbnail (must match with filter)
				type: text
			link:
				label: Link to project
				type : page
			thumb:
				label: Thumbnail of project (283px width * 217px height)
				type: text