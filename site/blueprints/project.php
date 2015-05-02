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