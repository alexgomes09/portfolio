<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
  sortable: true
  hide:false
fields:
  title:
    label: Title
    type:  text
  year:
    label: Year
    type:  text
  sidenote:
    label: Side Note (project information)
    type:  textarea
  text:
    label: Project Details
    type:  textarea
  tags:
    label: Techology used
    type:  tags
  sourcecode:
    label: Source Code
    type :url
  codesnippet:
    label: Code Snippet
    type: structure
    entry: >
      {{languagetype}} <br>
      {{code}} <br>
    fields:
      languagetype:
        label: What language is this? 
        type: text
      code:
        label: Paste code here
        type : textarea