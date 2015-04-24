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
         