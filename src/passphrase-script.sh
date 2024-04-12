#!/bin/bash

# Check if the SSL_PASSPHRASE environment variable is set
if [ -z "$SSL_PASSPHRASE" ]; then
    echo "Error: SSL_PASSPHRASE environment variable is not set."
    exit 1
fi

# Output the passphrase to stdout
echo "$SSL_PASSPHRASE"

