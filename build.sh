#!/usr/bin/env bash

# This script takes care of getting the last MeetUp event and inserts the HTML that represents it.

# START
set -e

# FUNCTIONS

get_ogimage() {
    echo $(curl -s "$1" | grep -o '<meta property="og:image" content="[^"]*' | sed 's/<meta property="og:image" content="//')
}

get_last_event() {
    # Download feed from the last event from MeetUp

    wget "--header='Cookie: $MEETUP_COOKIES'" $URL_RSS -O $TEMP_XML

    # Get data
    # Check if there are events
    if [ -z "$(xmlstarlet sel -t -v '//item' $TEMP_XML)" ]; then
	# No events found"
	render_html "" "" "" "" ""
    else
	title=$(xmlstarlet sel -t -v "//item/title" $TEMP_XML)
	link=$(xmlstarlet sel -t -v "//item/guid" $TEMP_XML)
	url_image=$(get_ogimage $link)
	description=$(xmlstarlet sel -t -v "//item/description" $TEMP_XML)
	pub_date=$(xmlstarlet sel -t -v "//item/pubDate" $TEMP_XML)
	date_format=$(date -d "(echo '$pub_date' | awk '{print $4,$3,$6}')" +"%d %B")
	# Render HTML
	render_html "$title" "$link" "$url_image" "$description" "$date_format"
    fi

    # Clean
    rm $TEMP_XML
}

render_html() {
    # Variables
    file_index="src/index.php"
    file_output="src/index.html"

    # Remove old index.html
    rm -f "$path_index"

    # Make new index.html with the new data
    php "$file_index" -- "title=$1&link=$2&url_image=$3&description=$4&date_format=$5" > "$file_output"

    # Compile Parcel
    npm run build
}

start() {
    get_last_event
}

# VARIABLES
TEMP_XML="temp.xml"
URL_RSS="https://www.meetup.com/es-ES/python-valencia-meetup/events/rss/"
#Testing group without events> URL_RSS="https://www.meetup.com/es-ES/ux-vlc-user-experience-y-estrategia/events/rss/"
URL_PAST_EVENTS="https://www.meetup.com/es-ES/python-valencia-meetup/events/past/"

# MAIN

# Check if exist cookies env variable
if [ -z "$MEETUP_COOKIES" ]; then
  echo "MEETUP_COOKIES env variable is not set. Please set it with the cookies value from MeetUp."
  exit 1
else
    start
fi
