        retVal=$?
        if [ $retVal -eq 1 ] then
            echo "Some Files Fixed"
            exit 0
        fi
        exit $retVal