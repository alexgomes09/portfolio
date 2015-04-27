<?php if(!defined('KIRBY')) exit ?>

title: Resume
pages: false
files: true
fields:
	title:
		label:
		type:
	skills:
		label: Skill Sets
		type: structure
		entry: >
			{{skill}} <br>
			{{range}}
		fields:
			skill:
				label: Skill Name
				type: text
			range:
				label: Skill range out of 100
				type: number
				min:0
				max:100 
	experience:
		label: Work Experience
		type: structure
		entry: >
			{{company}} <br>
			{{role}} <br>
			{{from}}
			{{to}} <br>
			{{description}}
		fields:
			company:
				label: Company Name
				type: text
			role:
				label: Role
				type: text	
			from:
				label: From (YYYY)
				type: number
				min:2000
				max:3000
			to:
				label: Until (YYYY)
				type: number
				min:2000
				max:3000
			description:
				label: Job Description
				type: textarea
	education:
		label: Education
		type: structure
		entry: >
			{{schoolname}} <br>
			{{major}} <br>
			{{degreetype}} <br>
			{{from}}
			{{to}}
		fields:
			schoolname:
				label: School Name
				type: text
			major:
				label: Program Name
				type: text	
			degreetype:
				label: Degree Name
				type: text	
			from:
				label: From (YYYY)
				type: number
				min:2000
				max:3000
			to:
				label: Until (YYYY)
				type: number
				min:2000
				max:3000
		