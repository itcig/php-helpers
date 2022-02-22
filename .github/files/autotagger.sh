#!/bin/bash

set -eo pipefail

VER=$(jq -r '.version' "package.json")
echo "Version from package.json is ${VER:-<unknown>}"
if [[ "$VER" =~ ^[0-9]+(\.[0-9]+)+.*$ ]]; then

    # Prefix tag with `v`
    VER="v$VER"

    echo "Creating tag for $VER"

    export GIT_AUTHOR_NAME=cig-bot
    export GIT_AUTHOR_EMAIL=cig-bot@users.noreply.github.com
    export GIT_COMMITTER_NAME=cig-bot
    export GIT_COMMITTER_EMAIL=cig-bot@users.noreply.github.com
    git tag "$VER"
    git push origin "$VER"
    if [[ -e package.json ]] && jq -e '.extra.autotagger.major?' package.json >/dev/null; then
      git tag --force "${VER%%.*}"
      git push --force origin "${VER%%.*}"
    fi
fi
