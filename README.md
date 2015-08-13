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
        ✓ Main Nav > add active state based on current visible section @beyond-cbp @done (15-08-10 11:08)
        □ Main Nav > add active state on hover @beyond-cbp
        □ Main Nav > change color depends on current bg @beyond-cbp
        □ Main Nav > link font-size 11px @beyond-cbp
        □ Main Nav > add submenu for Projects > [Refer to 'Projects Menu Structure'] @abp
        □ Main Header > faux-bg > remove @abp
        □ Logo > correct proportion @below-cbp
        □ All elements > add transitiion when entering visible section @abp
        □ Footer > add footer inside contact section @abp
        □ Footer > text > correct mistypes, align company phone & address side by side @abp
        □ Remove fullpage scroll @below-cbp
        □ All Buttons > Use SEC-BUTTON style @abp
        □ SEC-BUTTON > correct styling, switch filled/transparent on hover in/out @abp

SECTION:
    □ /CONCEPT
        □ Body > text > change alignment to center @beyond-l
        ✓ Body > text > add ability to print data from admin @beyond-l @be @done (15-08-13 15:22)
        □ Body > text > temporary remove @beyond-l @be
        □ Body > BG > Full viewport @abp
    □ /PROJECT
        ✓ Title > correct overflow @beyond-l @done (15-08-10 13:31)
        ✓ Title + Body > change into horizontal layout @below-cbp @done (15-08-10 13:31)
        □ Body > title > change png image into svg clip path @abp
    □ /MASTERPLAN
        ✓ MasterplanSVG > change width to filled up the viewport @below-l @beyond-hl @done (15-08-10 14:59)
    □ /EXCITEMENT
        □ Body > Correct transition to use transform translate @abp
        □ Body > Add another hit area (center), to trigger back to default state @abp
        □ Body > image > switch colored/greyscaled on hover in/out @abp
        □ /SINGLE-EXCITEMENT
            □ Page Header > Add theming, follows current design @abp
            □ Back button > Link to /Excitement, with active state @abp
            □ Modal > Full Screen [Layout refer to Sketches] @abp
            □ Modal > Add slider @abp
    □ /LOCATION
        □ Map > Height = Width Fullscreen @below-cbp
        □ Map > Enable zoom pan @below-cbp
    □ /NEWS
        ✓ Post Item > add various layout @below-l @done (15-08-10 14:58)
        □ Post Item > all sample Post must have thumbnail image @abp
        □ Post Item > Title line-height 2rem @abp
        □ Post Item > Body Font: 13px / 1rem @abp
        □ Post Item > image ratio 1:0.6 @abp
        □ Single Post Page > add theme style @abp
    □ /CONTACT
        □ Form > add implementation of ContactForm7 @abp @be
        □ Color > Invert from white to grey, SC-Copper to white @abp
        □ Subject field > Fix bug @abp
        □ Message field > Same style / interaction like other fields @abp

Projects Menu Structure:
    □ Projects
        □ Garden Residences
        □ Phase 2
        □ Phase 3
        □ Phase 4

Next Phase:
    □ SEO
    □ Header meta > description
    □ i18l

```