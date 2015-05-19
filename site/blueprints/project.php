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
  projectlocation:
    label: Project Running http link
    type: text
    required: false
  sourcecode:
    label: Source Code
    type :url
  download:
    label: Download content (uploaded .zip folder name)
    type: text
  tags:
    label: Techology used
    type:  tags
  text:
    label: Project Details
    type:  textarea
  codesnippet:
    label: Code Snippet
    type: structure
    entry: >
      {{filename}} <br>
      {{languagetype}} <br>
      {{code}} <br>
    fields:
      filename:
        label: File Name (will become the tab name / tab header)
        type: text
      languagetype:
        label: Language type (name of style based on prism)
        type: text
      code:
        label: Code ( will be tab content)
        type : textarea
      