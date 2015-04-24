<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
fields:
  avatar:
    label: Avatar
    type:  text
  title:
    label: Meta Title
    type:  text
  author:
    label: Meta Author
    type:  text
    icon:user
  description:
    label: Meta Description
    type:  textarea
  keywords:
    label: Meta Keywords
    type:  tags
  copyright:
    label: Copyright
    type:  textarea
  date:
    label: Date
    type: date
    format: DD-MMM-YYYY   