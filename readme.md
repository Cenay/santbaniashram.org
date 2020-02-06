# Sant Bani Ashram DB Project
The Divi theme is used on the WordPress site to handle the blog and store. This project ADDS an retreat database and admin editing to the process.  


# INPUTS:

Can pass some of what we need through the shortcode
[gravityform id="2" field_values="retreatid=april2020&start=2020-04-04&end=2020-04-10"]

>Gravity Forms allows for post [type] creation from form entries:  
https://www.gravityforms.com/add-ons/advanced-post-creation/  
Addon for custom posts types:  
https://wordpress.org/plugins/gravity-forms-custom-post-types/  
Addon for advanced permissions:  
https://forgravity.com/gravity-forms-security/  
Addon for repeating fields:  
https://gravitywiz.com/documentation/gravity-forms-nested-forms/  
See this for "updates" to the entry:  
https://github.com/jupitercow/gravity-forms-post-updates



Params: -> All populate hidden fields
 * Retreat ID (retreatid)
 * Retreat Start Date (start)
 * Retreat End Date (end)

Retreat ID: (ie: April2020 July2020 etc) [GF: 1 | param: retreatid]
Retreat Dates: Lori to provide -> Each Retreat has defined dates. 
Jan / Feb / April / July / Aug / Sept / Oct

  >Can pass data to the form with shortcode in this form:  
  [gravityform id="2" field_values="retreatid=april2020&start=2020-04-04&end=2020-04-10"]  

April Retreat Dates:

------------------
Retreat Start Date [GF: 2 | param: start]
Retreat End Date [GF: 3 | param: end]

Attendee Info

------------------
Attendee Name (first, last) [GF: 5 | first, last]
Gender (UPDATE -> add to form) [GF: 6 | gender]
Retreat Party Name (default -> Last name of the initial registrant) [GF: 7 | party]
Food Requirements (GF and Vegan -> GF)
Guest name
Guest gender (UPDATE -> add to form)

[\*]
Airport (ie: BOS)
Flight Number (ie: 1801)
-> Open only for Airport BOS
   Bus Terminal (ie include link to https://concordcoachlines.com/) 
Bus Terminal (Concord)

Arrival Times (UPDATE -> date, time) *
Departure Times (UPDATE -> date, time) *
Ride Requirements `[Yes/No]` (is this an assignment? [No]) -> Outputs -> File 9
  -> Pickup needed? -> (See airport/bus info above)
  -> Sort by Date order so their guy can drive it well. 
[\*]

Guest Requirements (Repeater)
 * First, last
 * Email (optional)
 * Gender
 * Over 21 yes/no (not age)
 * Food preferences  (GF, V, GF & V, NR)
 * Food notes
 * See [\*] and repeat for each guest -> Button to "same as above" -> If not same as above, then open the fields up for data entry. 

Bed Requirements (1 bed/cot per person)

NOTE: Force user account creation into WordPress
---

# Research
Can I send "WordPress" gravity form data to a 3rd party table by adding traits and observers to the plugin and push the data from the posts and postmeta tables?

-> On the Gravity Form submission function, we can insert special logic to write to our tables. 


### Internal Updates

Bed assignments, needs [0] Extra Beds

Admin Data Entry (GF Edit)
 * Bed Accommodation -> Room assigment
 * Attendee flight data
 * 2nd Table for Accommodations? Phase II

# Outputs

**File 1** 
---
Spreadsheet Style: Alphabetically Sorts Attendees
Goal: Kitchen -> Printed -> Hangs in kitchen

**[NEW]**  
_We would like this report/list to be sorted in the following order:_  
First Sort = Overnighters (those needing accommodations) versus LOCALS.
Second Sort = Last name
Third Sort = First name
All Overnighters (those needing accommodations) should appear on report before any LOCALS.  
**[END NEW]**


Format:  
-
Sorted by last name, alphabetical  
 * Party Name _(needs to include "grouping" so that guests appear next to attendees)_  
 * Name (last, first) -> one name per line  
 * Accommodations (building/location/rooms)  
 * Date (DOW, m/d)  
   * B, L, T  
 When dates wrap...
  * Repeat the first two columns, and provide additional date columns

---
**File 2**
---
Arrival Report (run before event when all bookings are complete)
  * Grouped by Date
    * Name, [arrival time], [guest name], bed assignment
    * Breakfast
      * Name(s) - bed location
    * Lunch
      * Name(s) - bed location
    * Tea
      * Name(s) - bed location
    * After Tea
      * Name(s) - bed location

Breakfast (B) = 7:00AM
Lunch (L) = 12:30PM
Tea (T) = 5:30PM
{cn} Added from Email dated 1/24/2020 @ 2:38pm

< before the date to count as present >

**[Q] Who determines or assigns the "rooms"**
_[Staff] When is this assigned: after all bookings complete or the cut-off date._
[DEV] Create "update" for room assignments

  * Lunch, After Lunch, Tea <- Lists names and "locations". Who determines this? Sample shown below: 

  After Lunch
  -----------
  Myriam Carreno – Concord 3:30pm, BH Attic
  Bruno Debas -  MB 3-5th vestibule
  Jackie Debas – MB 3-5th vestibule
  Bibiane Dogbe – MB Principle’s Office
  Comlan Dogbe – MB Principle’s Office 
  Marlene McCarty

---
**File 3 (Database)**  
---
Spread Sheet (database view)
Goal: Master list of all that is known of the retreat participates, arrival, departures, meal counts, and totals for staff. 
 Columns:
  * Name
  * Accommodations (lists requests)
  * Arrival and Departure (should these be two fields per guest? -- yes)
    (Each of Arrival and Departure to also add -> first meal (time) and last meal (time))
  * Arrival (sample shown: Sunday, 6/30 Lunch)
  * Departure (sample shown: Tuesday, 7/2 After Tea)
  * Meals to Go
  * Guest notes/requests
  Count Columns -> First Date / Breakfast, Lunch Tea
  * Each column contains the count of the guests on that date, at that meal
  * Totals: 
    * Sub total Overnight guests
    * Sub total Locals including ashramites
    * Total Combined (overnight + locals)

**[Q] Where on the form (or process) is the "local" status set/known?**
  [A] Lori: Add to the form, ask if they need accommodations.

**[Q] Should this form include the GF/V status within the count?**
  [A] No, this is database

Local's - no overnight
Ashramites
Overnighters, Retreat visitors

---
**File 4**
---
Departures
Goal: To detail the "checklist" of folks leaving and how, so staff can ensure transportation where required and proper exit ceremony. Line item should be marked if they are to receive a "Lunch to Go" -> LTG

 * IMPORTANT: At top place any guests where the departure date/time isn't yet known
 * Group by DOW, mm/dd
   * Name, [Flight Info], (if no flight info: time frame: ie: after tea), [method]
     (where [Flight Info] = airplane or bus itinerary details)
     (where [method] = ferry, bus) -> Derived from travel (mode of transportation)


---
**File 5**
---
Meal Count Report
Goal: To provide a count for the kitchen of each meal (breakfast, lunch, tea) for each day of the retreat. 

 * Day of Week (ie: Friday, 7/1)
 * Breakfast (int -> count for that time period)
 * Lunch (int -> count for that time period)
 * Tea (int -> count for that time period)
 * Date report printed (to validate how accurate it is)

Meal "set"  
UPDATE: (Total) -> / GF / Vegan / Subtotal  
UPDATE: Breakfast (category) -> Total, NR, V, GF  
UPDATE: Alternating row colors, force lines to be displayed  
UPDATE: Emphasis on Total (Bold)  

_Sample of the type of layout agreed upon_
![File 5 Meal Count Report](./img/file-5-meal-count-sample.jpg)


--- 
**File 6**
---
Guests present report. 
Goal: Should include in header the total count of all guests needing beds, total count present (and needing beds) at a single time -> the highest of the counts for each day. Should also include meal counts for both locals and Ashramites. Goes to the board.

Meals - Including Locals + Ashramites
 * Date (ie: Friday, 7/1)
 * Breakfast (int -> count for that time period)
 * Lunch (int -> count for that time period)
 * Tea (int -> count for that time period)
 
[?] Summary report produced at the end of the retreat and is a recap? 

---
**File 7**
---
Accommodations Report. 
Goal: Compare against the "magnetic" board that lists the people on the property at the time of a "fire drill".

**[Q] Not sure when this is run?**
  [A] Run at beginning and again after sig changes, for the fire dept, magnetic board makers

Grouped By: Building / \[Floor] (provide a count of people in that room/building)
 * Location (ie: Principals office, copy room, studio teachers office) -> **LU Table?**
 * Name of guest(s) 
 * Period present there (ie: Saturday at Tea through Sun - Lunch) 
   -> Format: \[Arr / Dep] (Friday, 7/2/2020 @ 4pm - Sunday 7/7/2020 @ 2pm)
 * UPDATE: New field for accommodation notes / Housekeeping notes (Phase II)

 (Where building / [floor] includes)

  * Middle Building / Main Floor (MB/MF)
  * Middle Building / Bottom Floor (MB/BF)
  * Upper Building (UB)
  * Big House (BH)
  * Cabin in the Woods
  * Susan Dyment's House 

UPDATED: 1/24/2020 -> Lori sent new information, this takes precedence over the above settings and fields. NEW requirement [Outside original scope]: Add the Typical and Max room capacity next to room name, remove them again on printed report for the fire department. 

UPDATED: 2/6/2020 -> Lori sent new information, this must ben added to the report.  
_Will be printed daily for EACH location IF there are updates/changes. IF there is a change in accommodations to only one location/building, can only that one report be printed? (Only that report for the "Team Captain") without printing all the other ones/building reports? (Fire Dept. liaison requested this.)_

 **(Where Location = Building / Floor and room is separate field)**  
   >Location will be dropdown  
   Room will be dropdown  
  
* Middle Building / 1st Floor (MB/1F) -> Was Bottom Floor
* Middle Building / 2nd Floor (MB/2F) -> Was Main Floor
* Middle Building / 3rd Floor (MB/3F) -> Was Upstairs
* Upper Building / 1st Floor (UB/1F)  -> Was Ground Floor
* Upper Building / 2nd Floor (UB/2F)
* Big House (BH)
* Cabin in the Woods (C)
* Susan Dyment's House (SD)

	
Middle Building / 1st Floor (ie: MB/1F Perkins)
* Kindergarten Room [4/6]
* 1st Grade Room [3/6]
* Kindergarten/1st Grade Vestibule [1]
* Science Lab [5/10]
* Pi [5/8]
* Perkins [5/8]
* 6th Grade Vestibule [1/4]
* 6th Grade Classroom [2/5]
* Tutoring Room [1/2]
* Tutoring Room Hallway [1/2]
* 3-5 Vestibule [1/4]
		
Middle Building / 2nd Floor (ie: MB/2F Principals Office)
* Principal's Office [2/3]       
* Copy Room [1]
* Studio, Office [1]
* 2nd Grade [4/8]
* Reading Room [1/4]
* Multipurpose Room [2/6]
		
Middle Building / 3rd Floor (ie: MB/3F Old 6th Grade)
* Old 6th Grade [4/8]
		
Upper Building / 1st Floor (ie: UB/1F Kitchen)
* Mutipurpose Room [5/8]
* Kitchen [1/2]
* 4th Grade Room [4/6]
* 3rd Grade Room [4/6]
		
Upper Building / 2nd Floor (ie: UB/2F 5th Grade Room)
* 5th Grade Room [4/6]
* Tutoring Room [1]

Big House / 1st Floor (ie: BH/1F Gerald's Room)
* Gerald's Room

Big House / 2nd Floor (ie: BH/2F Room #1 - Office [1])
* Room #1 - Office [1]  
* Room #2 - Office Conference Room [1]  
* Room #3 - Corner Room [2]  
* Room #4 - Master's Room [3/4]  
* Room #5 - Paneled Room [2]  
* Room #6 - Sky's Room [1]  
* Room #7 - Picture Room [1]  
* Room #8 - Old Office [2]  
   
Big House / 3rd Floor (ie: BH/3F Large Room)
* Large Room [4]
* Small Room [1/2]
		
Cabin [1]

Little House / 1st Floor (ie: LH/1F Kitchen)
* Kitchen [F3/F4]

Little House / 2nd Floor (ie: LH/2F Room #1)
* Room #1 [1/1C]
* Room #2 [2C/F3]
* Room #3 [2A/2K]

Susan Dyment's House (SD) [4/6]

---
**File 8**
---
Special Needs Diet
Goal: To help the kitchen prep (purchase) and cook meals to meet guests requirements. Header should contain the date of the report. 

Dev Note: This should ONLY include those names where one of these conditions are present. One or more of guests in that party require Vegan or GF options, or if any special notes are added on the food portion of the form. Subset of total meal data.

Group By Guest Type (Ashramites / Locals)
  * Guest name(s)
  * Vegan cnt
  * GF cnt
  * Special notes

**[Q] Should this be printed reports? Or is online only acceptable if the display can be made mobile responsive so either tablet or phones could display any or all of it?**

-> Printed
  * Write HTML, format, and then convert to PDF

---
**File 9**  
---
Transportation
Goal: Sort and provide him a list of who to take and when

Format: 
First Name (coming from XXX) [Phone]
Email
ARR: DOW, Date in Airport/Bus terminal [BOS or MHT]
DEP: DOW, Date in Airport/Bus terminal [BOS or MHT] 

If they choose BOS as airport, link to the Concorde Coach Lines

Dropdown: 
 * BOS -> Boston Logan International Airport (BOS)
 * MHT -> Manchester•Boston Regional Airport (MHT)
 * 

[DEV NOTES]
Group By 
 * Arrival
   * Date/Time
     * Name
 * Departure
   * Date/Time
     * Name

Sort by Arrival Venue (Location)

---
**File 10**
---
**[NEW]**  
Notes Report
Goal: This will be a list that contains: Person's Name/all in party; Arrival (ARR) Date and Time, Departure (DEP) Date and Time, include whether V or GF are selected, Content of NOTES field. This should be sorted by Last Name, First Name (_but displayed first name/last name if easy_). Sample attached to email 2/1/20 titled FILE 10 Notes Report Sample 013020.docx (Converted to .doc and saved in Dropbox../Teamwork/Client provided).  
DEV NOTE: I suspect she is asking for ONLY those that have special notes added to the admission form, validate via email. 

Heading: (Center on page)
-
Notes Report for July 2020 Retreat
(current as of 2/1/2020) <- Date the report was run  

Format:  
**First Last - Meal Preference**  
  _Guest name - meal preference_
  _Guest name - meal preference_
  _Guest name - meal preference_
ARR: 7/5 at 9am
DEP: 7/9 at 8pm
John suffers from an identity disorder and lacks a sense of self-esteem.  (With the last name Doe, it’s too bad his parents named him John.)  We need a room with a mirror so he can recognize himself. 


---
**File 11** 
**[NEW]**  
---
Short Retreat Report
Goal: Short report listing only people in the Big House, without the requirement to include all the building in the normal report set. _Only July Retreat uses all buildings. All other Retreats use only the Big House (BH)._   

Heading: (Center on page)  
-
Overnight Guests  
February Retreat, Saturday, February 8th  
(current as of Jan 31)   <- date report printed  

Format: (Left align content, bold the name and room (1st line))
-
First Last, Room - Meal Preference
ARR: DOW - Before Tea
DEP: Sunday - After Breakfast
NOTES: _May_ have Tea Friday.  Sat = Fruit for breakfast, regular Lunch and Tea.

The possible "time frames" are:  
 * Before Breakfast
 * After Breakfast
 * Before Lunch
 * After Lunch
 * Before Tea
 * After Tea

This will list guests by Room. This only includes Big House (BH). Rooms listed in order starting on 1st Floor (Gerald's Room) ONLY IF SOMEONE IS OCCUPYING ROOM, then 2nd Floor, rooms in order ONLY IF SOMEONE IS OCCUPYING ROOM, followed by 3rd floor (ONLY IF SOMEONE IS IN ROOM).
It will list person's Name (1st, Last),
V and/or GF only, (if selected).
[PROBLEM: Many arrive before a meal but don't want to eat. Many fast for certain meals. For SHORT RETREATS, can we have guests select which meals they will eat? Otherwise, we end up preparing way too much food. So arrival and departure times are way looser and could be listed this way for both arrivals and departures:
Before Breakfast
After Breakfast
Before Lunch
After Lunch
Before Tea
After Tea
And they could then SELECT individual meals each day they are here. This will help ensure accuracy of the Meal Count Report. This applies only to Short Retreats - all but July.]
ARR Date and Timing
DEP Date and Timing
ARR = Arrival please abbreviate
DEP = Departure please abbreviate
Notes Wonder if it is possible to select whether Notes print. (This form is visible for many to see. If this is problematic, don't include Notes with this report.)
Sample attached to email 2/1/20.


DEVELOPER NOTES: 
 * For each "section" (Meals, Beds, Rides) allow admin to insert "notes"

# Tasks
 * Install Gravity Forms on Sant Bani site  
-> So we can push the data to WordPress tables, custom post type.  
-> Can we cross-store the purchases to the "retreat" participants? 

{1/10/2020} -- Installed
Gravity Forms version 2.4.16.7
Gravity Forms Advanced Post Creation Add-On version 1.0-beta-3
Gravity Forms User Registration Add-On version 4.4

 * Authentication API Version 2

>Gravity Forms API Keys Setup: (Impersonating cnailorAdmin account)  
Consumer Key: ck_1fb64b4c61b0ac546d159290938115aa34488666  
Consumer Secret: cs_8ea6b75476768a9edf9084b60c293c9335a69bc1  

Authentication API version 1
---
Public API Key: b47668c3df
Private API Key: fcb2a76392a6adc
QR Code: (See Dropbox/\_Sites/santbaniashram.org/cloaked/Gravity Forms/qr-code-api-version-1-authentication.jpg)
Impersonate account: cnailorAdmin

# LGL and Data Export/Import
(Potential Feature Creep)  
There would be a lot of overlap as far as contact information.  I know LGL has capabilities of importing, and it might be good for the designers of the new database to have this in mind. See https://help.littlegreenlight.com/article/51-using-the-flex-importer for their explanation of how their importer works. - JP  

Lori suggests in her reply that we "design the Retreat DB project to allow the LGL app to import data from it".  

NOTE: This changes the complexion of the design and implmentation significantly as we had built the design based on being self-contained and not having the requirement of sharing data outside the WordPress eco-system. 

RESEARCH: Believe that WP All Import (with the WP All Export addon) will allow pulling data out of the WordPress database and creation of CSV which can be imported into LGL with a minimum of fuss.  

I own a developers license, so there is no extra cost for the plugin. 



Lori
 * List of the static building / location / room name (and the room number)

<hr/>

# Specifications
 * Registration forms are only discoverable / visible to those that have the link, and will not be a part of the menu structure or internal linking on the site. 
 * Those who register should receive a visual confirmation of a sucessful submission, and an emailed copy of their responses.
 * Those who register should be able to edit their form data if logged in
 * The primary attendee must require an email, or allow Lori to create an "Attendee record set", and mark it "don't send to email for attendee" as it will contain a bogus email address. 
  
 
 Initial Meeting (Lori, Gil and Cenay): 
 https://mmb-vids.s3.amazonaws.com/gac-sant-bani-database-project.mp4
 
 SBA and TCS meeting (Gil and Cenay)
 https://mmb-vids.s3.amazonaws.com/gac-sant-bani-database-project.mp4
 
 SBA Clarification Meeting with Lori (Lori, Gil and Cenay)
 https://mmb-vids.s3.amazonaws.com/gac-sant-bani-database-lori-clarifications.mp4


# Custom Post Type
Retreats : dashicons-clipboard (group)
Guests   : dashicons-groups (people)

# Method To Write to Table AFTER Form Submission
```
add_action("gform_after_submission_3", "input_fields", 10, 2);
function input_fields($entry, $form){
   global $gravitydb;

   $entry["1"] = $_POST["name"];
   $entry["2"] = $_POST["email"];

   $SQL = "INSERT INTO users ( userID, name, email) VALUES ( '', $_POST["name"] , $_POST["email"], '$purchase_date', '$order_number')";
   $wpdb->query($SQL);
}
```

### Second sample of how
This goes into the functions.php of course. 

```
add_action('gform_after_submission', 'endo_add_entry_to_db', 10, 2);
function endo_add_entry_to_db($entry, $form) {

	  // uncomment to see the entry object 
	  // echo '<pre>';
	  // var_dump($entry);
	  // echo '</pre>';

  	$source = $entry['source_url'];
  
	  $email = 	$entry[5];
	  $param1 = 	$entry[2];
	  $param2 = 	$entry[3];


  	global $wpdb;
  
  	// add form data to custom database table
	$wpdb->insert(
	    'custom_table_name',
	    array(
	      'source_url' => $source,
	      'email' => $email,
	      'param1' => $param1,
	      'param2' => $param2,
	      'date' => current_time( 'mysql' )
	    )
	);

}
```