        vendor/bin/phpcbf
        retVal=$?
        if [ $retVal -eq 1 ] then
            echo "Some Files Fixed"
            echo '::set-output name=FIXED::true'
            exit 0
        fi
        exit $retVal