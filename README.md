### Southeast Capital Website ###

# Outstanding requirement #

```

Notes:
    □ breakpoints:
        □ h   : Handheld
        □ hl  : Handheld Landscape
        □ tp  : Tablet Portrait
        □ l   : Large
        □ h   : High Res
        □ abp : All Breakpoint
        □ dbp : Default Breakpoint
        □ cbp : Critical Breakpoint ( Tablet Portrait )
    □ be: Backend ( Otherwise noted, every task is Frontend only )
    □ fe: Frontend

GLOBAL:
        □ Main Nav > add mobile version @below-cbp
        □ Main Nav > add active state based on current visible section @beyond-cbp
        □ Main Header > faux-bg > adjust style based on current visible section @abp
        □ Logo > correct proportion @below-cbp
        □ All elements > add transitiion when entering visible section @abp
        □ Footer > add footer @abp

SECTION:
    □ CONCEPT
        □ Body > text > change alignment to center @beyond-l
        □ Body > text > add ability to print data from admin @beyond-l @be
    □ PROJECT
        □ Title > correct overflow @beyond-l
        □ Title + Body > change into horizontal layout @below-cbp
    □ MASTERPLAN
        □ MasterplanSVG > change width to filled up the viewport @below-l @beyond-hl
    □ EXCITEMENT
        □ Body > Correct transition to be more smooth @abp
    □ LOCATION
    □ NEWS
        □ Post Item > add various layout @below-l
        □ Single Post Page > add theme style @abp
    □ CONTACT
        □ Form > add implementation of ContactForm7 @abp @be


```