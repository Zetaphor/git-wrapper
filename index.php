use GitWrapper\GitWrapper;

// Initialize the library. If the path to the Git binary is not passed as
// the first argument when instantiating GitWrapper, it is auto-discovered.
require_once 'vendor/autoload.php';
$wrapper = new GitWrapper();

// Optionally specify a private key other than one of the defaults.
$wrapper->setPrivateKey('/path/to/private/key');

// Clone a repo into `/path/to/working/copy`, get a working copy object.
$git = $wrapper->clone('git://github.com/cpliakas/git-wrapper.git', '/path/to/working/copy');

// Create a file in the working copy.
touch('/path/to/working/copy/text.txt');

// Add it, commit it, and push the change.
$git
    ->add('test.txt')
    ->commit('Added the test.txt file as per the examples.')
    ->push();

// Render the output.
print $git->getOutput();

// Stream output of subsequent Git commands in real time to STDOUT and STDERR.
$wrapper->streamOutput();

// Execute an arbitrary git command.
// The following is synonymous with `git config -l`
$wrapper->git('config -l');
