#!/usr/bin/bash
# This script is for building the db
# Meant to run on a linux host
# If you're a windows user then 🙃
mysql -u root -p < schema.sql
