#!/usr/bin/env bash
echo "Deploying sample data" \
&& bin/magento sampledata:deploy \
&& bin/magento setup:upgrade
