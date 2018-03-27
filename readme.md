# SLACK INVITE
> This app helps you invite users to your Slack workspace automatically by simply submitting their mail.

## Requirements
- [PHP](https://php.net) 5.6+
- [Composer](https://getcomposer.org)

## Usage
- Clone this repository by inputting the following into your Terminal (Command Line/Prompt on Windows):

```bash
git clone https://github.com/iamwebwiz/slack-invite
```

or clone into a desired directory name using

```bash
git clone https://github.com/iamwebwiz/slack-invite slack-invitation
```

- Once cloning is done, switch to the cloned directory from your terminal: `cd slack-invite` or whatever the name is that you used.
- Install **composer** dependencies by running this command in the terminal:

```bash
composer install
```

- Create a new file (.env) by using the `touch .env` command and copy the contents of **.env.example** to it, or you can copy the contents directly from the command line using `copy .env.example .env` (Command Prompt on Windows) or `cp .env.example .env` (Linux/UNIX Terminals).

- Modify the contents of the **.env** file by adding the following lines anywhere you feel like, preferrably go to the last line of the file:

```bash
SLACK_TEAM_NAME="YOUR SLACK TEAM NAME"
TEAM_DESCRIPTION="YOUR SLACK TEAM DESCRIPTION"
SLACK_TEAM_URL="YOUR SLACK TEAM URL WITHOUT THE TRAILING FORWARD SLASH"
SLACK_API_TOKEN="apap-2526258373-71328384096-187220289412-01c2c6637bb0d474f39f24e0a79d6e072"
SLACK_TEAM_EMAIL="YOUR SLACK TEAM EMAIL"
```

- Modify the values in quotes to suit your workspace/slack team.

> To get your Slack Api Token, check [https://api.slack.com/custom-integrations/legacy-tokens](https://api.slack.com/custom-integrations/legacy-tokens) and go to Legacy Token Generator to issue the token.

- Generate your app key by running `php artisan key:generate` to make your app run.

- Do a `php artisan serve` from your terminal to launch the app. Open your browser and go to `http://localhost:8000/` and you have the app sitting there.

## Contributions

Your contributions on this app are welcome. Simply `Fork` this repository, make your contribution and `Submit a Pull Request`. I will definitely appreciate it.

## Thanks?

You can appreciate me by **starring** this repository and follow me on [GitHub](https://github.com/iamwebwiz) and [Twitter](https://twitter.com/iamwebwiz)!

Much Love!

**Ezekiel Oladejo | Webwiz**
